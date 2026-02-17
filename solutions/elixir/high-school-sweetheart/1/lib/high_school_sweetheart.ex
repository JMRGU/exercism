defmodule HighSchoolSweetheart do
  def first_letter(name) do
    name
    |> String.trim()
    |> String.first()
  end

  def initial(name) do
    name
    |> first_letter()
    |> String.upcase()
    |> Kernel.<>(".")
  end

  def initials(full_name) do
    [forename, surname] = full_name
    |> String.split(" ")
    initial1 = forename
    |> initial()
    initial2 = surname
    |> initial()

    "#{initial1} #{initial2}"
    # terrible but couldn't get Enum.map() to work
  end

  def pair(full_name1, full_name2) do

    initials1 = full_name1
    |> initials
    initials2 = full_name2
    |> initials

    """
         ******       ******
       **      **   **      **
     **         ** **         **
    **            *            **
    **                         **
    **     #{initials1}  +  #{initials2}     **
     **                       **
       **                   **
         **               **
           **           **
             **       **
               **   **
                 ***
                  *
    """
    
  end
end
