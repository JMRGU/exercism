defmodule LibraryFees do
  def datetime_from_string(string) do
    NaiveDateTime.from_iso8601!(string)
  end

  def before_noon?(datetime) do
    # datetime.hour < ~T"12:00:00".hour
    Time.before?(NaiveDateTime.to_time(datetime), ~T"12:00:00")
  end

  def return_date(checkout_datetime) do
    # take NDT, return Date
    # 28 || 29 days later if before / after noon
    
    late = if before_noon?(checkout_datetime), do: 28, else: 29
    checkout_datetime
      |> NaiveDateTime.add(late, :day)
      |> NaiveDateTime.to_date()
  end

  def days_late(planned_return_date, actual_return_datetime) do
    # if return <= actual, return 0, else return difference in days
    difference = Date.diff(planned_return_date, NaiveDateTime.to_date(actual_return_datetime))
    if difference < 0, do: abs(difference), else: 0
  end

  def monday?(datetime) do
    datetime
      |> NaiveDateTime.to_date()
      |> Date.day_of_week() === 1
  end

  def calculate_late_fee(checkout, return, rate) do
    # 2x ISO8601s
    # checkout |> datetime_from_string() |> return_date
    # both |> days_late (|> monday?  div/2)

    due_date = checkout
      |> datetime_from_string()
      |> return_date

    returned_date = return |> datetime_from_string()

    late = days_late(due_date, returned_date)

    cond do
      late > 0 and monday?(returned_date) -> floor(late * rate / 2)
      late > 0 -> floor(late * rate)
      true -> 0
    end
  end
end
