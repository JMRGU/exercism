defmodule TwoFer do
  @doc """
  Two-fer or 2-fer is short for two for one. One for you and one for me.
  """
  @spec two_fer(String.t()) :: String.t()
  def two_fer(name \\ "") when is_binary(name) do
    case name do
      "" -> "One for you, one for me."
      _ -> "One for #{name}, one for me."
    end
  end

  @spec two_fer(Integer) :: Exception
  def two_fer(_), do: raise(FunctionClauseError, "Invalid type passed; provide a String.")
  
  
  # Technically works, but not idiomatic, I gather:
  # def two_fer(""), do: "One for you, one for me."
  # def two_fer(), do: "One for you, one for me."
  # def two_fer(name) when is_binary(name), do: "One for #{name}, one for me."
  # def two_fer(_), do: raise(FunctionClauseError, "Invalid type passed; provide a String.")
  
end
