defmodule GuessingGame do
  def compare(secret_number), do: "Make a guess"
  def compare(secret_number, guess) do
    cond do
      is_atom(guess) -> "Make a guess"
      secret_number == guess -> "Correct"
      guess - secret_number == 1 or secret_number - guess == 1 -> "So close"
      guess > secret_number -> "Too high"
      guess < secret_number -> "Too low"
      true -> "Make a guess"
    end
  end
end
