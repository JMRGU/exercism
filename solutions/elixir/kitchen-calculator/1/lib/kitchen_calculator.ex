defmodule KitchenCalculator do
  # Task 1
  def get_volume(volume_pair) do
    {_, volume} = volume_pair
    volume
  end

  # Task 2
  def to_milliliter(volume_pair = {:cup, _}) do
    {:milliliter, get_volume(volume_pair) * 240}
  end
  def to_milliliter(volume_pair = {:milliliter, _}) do
    {:milliliter, get_volume(volume_pair)}
  end
  def to_milliliter(volume_pair = {:fluid_ounce, _}) do
    {:milliliter, get_volume(volume_pair) * 30}
  end
  def to_milliliter(volume_pair = {:teaspoon, _}) do
    {:milliliter, get_volume(volume_pair) * 5}
  end
  def to_milliliter(volume_pair = {:tablespoon, _}) do
    {:milliliter, get_volume(volume_pair) * 15}
  end

  # Task 3
  def from_milliliter(volume_pair, unit = :cup) do
    {unit, get_volume(volume_pair) / 240}
  end
  def from_milliliter(volume_pair, unit = :milliliter) do
    {unit, get_volume(volume_pair)}
  end
  def from_milliliter(volume_pair, unit = :fluid_ounce) do
    {unit, get_volume(volume_pair) / 30}
  end
  def from_milliliter(volume_pair, unit = :teaspoon) do
    {unit, get_volume(volume_pair) / 5}
  end
  def from_milliliter(volume_pair, unit = :tablespoon) do
    {unit, get_volume(volume_pair) / 15}
  end

  # Task 4
  def convert(volume_pair, unit) do
    # Convert to millileter, then to unit
      # (surely not intended to write out functions for every single combination of units..?)
    ml = to_milliliter(volume_pair)
    from_milliliter(ml, unit)
  end
end
