defmodule HighScore do

  @initial_score 0
  

  def new() do
    %{}
  end

  def add_player(scores, name, score \\ @initial_score) do
    Map.put(scores, name, score)
  end

  def remove_player(scores, name) do
    Map.delete(scores, name)
  end

  def reset_score(scores, name) do
    Map.put(scores, name, @initial_score)
    # %{scores | name => 0} # existing keys only
  end

  def update_score(scores, name, score) do
    # {_, res} = Map.get_and_update(scores, name, fn val -> {val, score + (val || 0)} end) # get_and_update/3 must return a tuple
    # res

    # supposed to use Map.update/4, whoops
    Map.update(scores, name, score, fn val -> val + score end)
  end

  def get_players(scores) do
    Map.keys(scores)
  end
end
