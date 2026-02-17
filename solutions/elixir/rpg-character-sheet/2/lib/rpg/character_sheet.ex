defmodule RPG.CharacterSheet do
  def welcome() do
    IO.puts("Welcome! Let's fill out your character sheet together.")
    :ok
  end

  def ask_name() do
    name = IO.gets("What is your character's name?\n")
    String.trim(name)
  end

  def ask_class() do
    # ripe for a single "get_input(prompt)" function
    class = IO.gets("What is your character's class?\n")
    String.trim(class)
  end

  def ask_level() do
    level = IO.gets("What is your character's level?\n")
    {i, _} = Integer.parse(level) # I'm sure there was a shorthand operator for this
    i
  end

  def run() do
    welcome()
    name = ask_name()
    class = ask_class()
    level = ask_level()
    
    map = %{:class => class, :level => level, :name => name}
    IO.inspect(map, label: "Your character")
  end
end
