defmodule Lasagna do
  # 'expected_minutes_in_oven/0' function
  def expected_minutes_in_oven, do: 40
  # 'remaining_minutes_in_oven/1' function
  def remaining_minutes_in_oven(mins) do
    expected_minutes_in_oven() - mins
  end
  # 'preparation_time_in_minutes/1' function
  def preparation_time_in_minutes(layers) do
    2 * layers
  end
  # 'total_time_in_minutes/2' function
  def total_time_in_minutes(layers, mins) do
    preparation_time_in_minutes(layers) + mins
  end  
  # 'alarm/0' function
  def alarm, do: "Ding!"
end
