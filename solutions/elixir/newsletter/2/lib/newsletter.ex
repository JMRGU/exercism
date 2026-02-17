defmodule Newsletter do
  def read_emails(path) do
    File.read(path) |> elem(1) |> String.split("\n", trim: true)
  end

  def open_log(path) do
    File.open!(path, [:write]) # |> elem(1) # If File.open: returns tuple of {:ok|etc., PID}; must select 1th element
  end

  def log_sent_email(pid, email) do
    IO.puts(pid, email)
  end

  def close_log(pid) do
    File.close(pid)
  end

  def send_newsletter(emails_path, log_path, send_fun) do
    # Identify recipients from email address file
    recipients = read_emails(emails_path)
    # Open logfile
    log = open_log(log_path)
    # Send, write address to logs if successful (otherwise keep trying..?)
    recipients
      |> Enum.map(fn email ->
        res = send_fun.(email)
        if res == :ok do
          log_sent_email(log, "#{email}") # No need to interp newlines - where do they come from?
          end
        end)
    # Close logfile
    close_log(log)
  end
end
