defmodule HighScore do
  def new() do
    %{}
  end

  def add_player(scores, name, score \\ 0) do
    Map.put(scores, name, score)
  end

  def remove_player(scores, name) do
    Map.delete(scores, name)
  end

  def reset_score(scores, name) do
    Map.put(scores, name, 0)
    # %{scores | name => 0} # existing keys only
  end

  def update_score(scores, name, score) do
    {_, res} = Map.get_and_update(scores, name, fn val -> {val, score + (val || 0)} end) # get_and_update/3 must return a tuple
    res
  end

  def get_players(scores) do
    Map.keys(scores)
  end
end
