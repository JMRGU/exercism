defmodule BirdCount do
  def today([]), do: nil
  def today(list) do
    [today | _] = list
    today
  end

  def increment_day_count([]), do: [1]
  def increment_day_count(list) do
    today_count = today(list) + 1
    [_ | prior] = list
    [today_count | prior]
  end

  def has_day_without_birds?(list) do
    0 in list
  end

  def total([]), do: 0
  def total(list) do
    # would foldl here
    [head | tail] = list
    head + total(tail)
  end

  def busy_days([]), do: 0
  def busy_days(list) do
    [head | tail] = list
    if(head >= 5, do: 1 + busy_days(tail), else: busy_days(tail))
  end
end
