defmodule BoutiqueSuggestions do
  def get_combinations(tops, bottoms, options \\ [maximum_price: 100.0]) do
    for top <- tops,
      bottom <- bottoms,
      top.base_color != bottom.base_color,
      top.price + bottom.price <= (options[:maximum_price] || 100.0) do # This isn't right, can't figure out how to properly supply default, so submitting this to review other solutions
        {top, bottom}
      end
  end
end
