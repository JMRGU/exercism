defmodule NameBadge do
  def print(id, name, department) do
    prefix = if !id, do: "", else: "[#{id}] - "
    suffix = if !department, do: "OWNER", else: String.upcase(department)

    "#{prefix}#{name} - #{suffix}"
  end
end
