defmodule GottaSnatchEmAll do
  @type card :: String.t()
  @type collection :: MapSet.t(card())

  # First Elixir ex in a long time

  @spec new_collection(card()) :: collection()
  def new_collection(card) do
    MapSet.new([card])
  end

  @spec add_card(card(), collection()) :: {boolean(), collection()}
  def add_card(card, collection) do
    if MapSet.member?(collection, card) do
       {true, MapSet.put(collection, card)}
    else
       {false, MapSet.put(collection, card)}
    end
  end

  @spec trade_card(card(), card(), collection()) :: {boolean(), collection()}
  def trade_card(your_card, their_card, collection) do
    if MapSet.member?(collection, your_card) do
      if MapSet.member?(collection, their_card) do
        {false, MapSet.delete(collection, your_card)}
      else
        {true, MapSet.put(MapSet.delete(collection, your_card), their_card)}
      end
    else
      {false, MapSet.put(collection, their_card)}
    end
  end

  @spec remove_duplicates([card()]) :: [card()]
  def remove_duplicates(cards) do
    MapSet.new(cards)
    |> Enum.sort()
  end

  @spec extra_cards(collection(), collection()) :: non_neg_integer()
  def extra_cards(your_collection, their_collection) do
    MapSet.difference(your_collection, their_collection)
    |> MapSet.size()
  end

  @spec boring_cards([collection()]) :: [card()]
  def boring_cards(collections) do
    case collections do
      [first | rest] -> rest
        |> Enum.reduce(first, fn x, acc -> MapSet.intersection(x, acc) end)
        |> MapSet.to_list()
        |> Enum.sort()
      _ -> []
    end

    # I would personally .concat() |> .frequencies() |> .filter() 
      # Ah but it's cards they ALL have, so it's not quite that simple
      # Produced anyway:
    # collections
    # |> Enum.concat()
    # |> Enum.frequencies()
    # |> Enum.filter(fn {_, b} -> b > 1 end)
    # |> Enum.map(fn {a, _} -> a end)
    # |> Enum.sort()
  end

  @spec total_cards([collection()]) :: non_neg_integer()
  def total_cards(collections) do

    # My alternate way: flatten, count freq, select where freq=1
    collections
    |> Enum.concat
    |> Enum.frequencies()
    |> Enum.filter(fn {_, b} -> _b = 1 end)
    |> length()

    # Suggested method
    # case collections do
      # [first | rest] -> rest
        # |> Enum.reduce(first, fn x, acc -> MapSet.union(x, acc) end)
        # |> MapSet.size()
      # _ -> 0
    # end
  end

  @spec split_shiny_cards(collection()) :: {[card()], [card()]}
  def split_shiny_cards(collection) do

    # Not happy with this, definitely a better method
    split_collection = collection
      |> MapSet.split_with(fn x -> String.starts_with?(x, "Shiny ") end)

    case split_collection do
      {shiny, ordinary} ->
        sorted_shiny = MapSet.to_list(shiny) |> Enum.sort()
        sorted_ordinary = MapSet.to_list(ordinary) |> Enum.sort()
        {sorted_shiny, sorted_ordinary}
    end
    
  end
end
