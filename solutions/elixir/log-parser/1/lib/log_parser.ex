defmodule LogParser do
  def valid_line?(line) do
    line =~ ~r/^\[(DEBUG|INFO|WARNING|ERROR)\]{1}/
  end

  def split_line(line) do
    line |> String.split(~r/<[~*=-]*>/)
  end

  def remove_artifacts(line) do
    line |> String.replace(~r/end\-of\-line\d+/i, "")
  end

  def tag_with_user_name(line) do
    matches = Regex.run(~r/User[\s\t]+([\w\d!_\p{Emoji}]+)/u, line)
    case matches do
      nil -> line
      _ -> "[USER] #{List.last(matches)} #{line}" 
    end
  end
end
