defmodule BoutiqueInventory do
  def sort_by_price(inventory) do
    inventory |> Enum.sort_by(&(&1.price))
  end

  def with_missing_price(inventory) do
    # filter for those with price: nil
    inventory |> Enum.filter(fn item -> !item.price end)
    
  end

  def update_names(inventory, old_word, new_word) do
    inventory
      |> Enum.map(fn item -> %{name: item.name |> String.replace(old_word, new_word), price: item.price, quantity_by_size: item.quantity_by_size} end)
  end

  def increase_quantity(item, count) do
    %{
      name: item.name,
      price: item.price,
      quantity_by_size: item.quantity_by_size |> Map.new(fn {k, v} -> {k, v + count} end) 
    }
  end

  def total_quantity(item) do
    item.quantity_by_size |> Enum.reduce(0, fn {k, v}, acc -> v + acc end)
  end
end
