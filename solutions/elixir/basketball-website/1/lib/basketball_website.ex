defmodule BasketballWebsite do
  def extract_from_path(data, path) when path === "", do: data
  def extract_from_path(data, path) do
    # split path by .
    # recurse through extract_from_path(submap, next step) until chain completed
    [h | t] = String.split(path, ".")
    extract_from_path(data[h], Enum.join(t, "."))
  end

  def get_in_path(data, path) do
    get_in(data, String.split(path, "."))
  end
end
