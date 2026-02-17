defmodule KitchenCalculator do
  # Task 1
  def get_volume(volume_pair) do
    {_, volume} = volume_pair
    volume
  end

  # Task 2
  def to_milliliter({:cup, volume}) do
    {:milliliter, volume * 240}
  end
  def to_milliliter({:milliliter, volume}) do
    {:milliliter, volume}
  end
  def to_milliliter({:fluid_ounce, volume}) do
    {:milliliter, volume * 30}
  end
  def to_milliliter({:teaspoon, volume}) do
    {:milliliter, volume * 5}
  end
  def to_milliliter({:tablespoon, volume}) do
    {:milliliter, volume * 15}
  end

  # Task 3
  def from_milliliter({_, volume}, unit = :cup) do
    {unit, volume / 240}
  end
  def from_milliliter({_, volume}, unit = :milliliter) do
    {unit, volume}
  end
  def from_milliliter({_, volume}, unit = :fluid_ounce) do
    {unit, volume / 30}
  end
  def from_milliliter({_, volume}, unit = :teaspoon) do
    {unit, volume / 5}
  end
  def from_milliliter({_, volume}, unit = :tablespoon) do
    {unit, volume / 15}
  end

  # Task 4
  def convert(volume_pair, unit) do
    # Convert to millileter, then to unit
      # (surely not intended to write out functions for every single combination of units..?)
    ml = to_milliliter(volume_pair)
    from_milliliter(ml, unit)
  end
end
