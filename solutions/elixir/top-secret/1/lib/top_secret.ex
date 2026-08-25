defmodule TopSecret do

  # Haven't looked at Elixir for months, and had an absolutely awful time with this exercise
  # Confident that my solution is mediocre and unidiomatic; my lack of fluency in the language made this an ordeal to put together
  # (I'm also testing in an online Elixir playground, which blocks Macro, quote et al. (can't install Elixir on this machine))

  def to_ast(string) do
    Code.string_to_quoted!(string)
  end

  def decode_secret_message_part(ast, acc) do
    case ast do
        {x, _, ast_node} when x in [:def, :defp] ->
          [head | _] = ast_node
          # Check for guard
          {is_guard, _, defin} = head
          {nm, _, args} = if is_guard == :when do
            [h | _] = defin
            h
          else
            head
          end
          
          if is_list(args) do
            if length(args) == 0 do
              {ast, ["" | acc]}
            else
              {ast, [String.slice(to_string(nm), 0..(length(args) - 1)) | acc]}
            end
          else
            {ast, ["" | acc]}
          end
      _ -> {ast, acc}
    end
  end

  def decode_secret_message(string) do
    ast = to_ast(string)
    walked = Macro.prewalk(ast, [], &decode_secret_message_part/2)
    {_, acc} = walked
    acc |> Enum.reverse() |> Enum.join()
  end
end
