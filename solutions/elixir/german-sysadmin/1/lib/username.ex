defmodule Username do
  def sanitize(username) do
    # ä becomes ae
    # ö becomes oe
    # ü becomes ue
    # ß becomes ss

    case username do
      [h | t] when h >= ?a and h <= ?z -> [h] ++ sanitize(t)
      [h | t] when h === ?_ -> [h] ++ sanitize(t)
      [h | t] when h === ?ä -> [?a,?e] ++ sanitize(t)
      [h | t] when h === ?ö -> [?o,?e] ++ sanitize(t)
      [h | t] when h === ?ü -> [?u,?e] ++ sanitize(t)
      [h | t] when h === ?ß -> [?s,?s] ++ sanitize(t)
      [h | t] when h < ?a or h > ?z -> sanitize(t)
      _ -> []
    end
  end
end
