defmodule TakeANumber do
  def start() do
    spawn(&machine/0)
  end

  defp machine() do
    ticket = 0
    wait_for_message(ticket)
  end

  defp wait_for_message(ticket) do
    receive do
      {:report_state, sender_pid} -> send(sender_pid, ticket); wait_for_message(ticket)
      {:take_a_number, sender_pid} -> send(sender_pid, ticket + 1); wait_for_message(ticket + 1)
      :stop -> nil # Process.exit(self(), :kill)
      _ -> wait_for_message(ticket)
    end
  end
end
