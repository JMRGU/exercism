defmodule LanguageList do
  def new() do
    []
  end

  def add(list, language) do
    [language | list ]
  end

  def remove(list) do
    [_head | tail] = list
    tail
  end

  def first(list) do
    [head | _tail] = list
    head
  end

  def count(list) do
    # don't see a kernel function for this, so let's reduce
    List.foldl(list, 0, fn _x, acc -> acc + 1 end)
  end

  def functional_list?(list) do
    "Elixir" in list
  end
end
