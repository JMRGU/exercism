defmodule RemoteControlCar do
  @enforce_keys [:nickname]
  defstruct [:nickname, battery_percentage: 100, distance_driven_in_meters: 0]
  def new() do
    %RemoteControlCar{nickname: "none"}
    
  end

  def new(nickname \\ "none") do
    %RemoteControlCar{nickname: nickname}
  end


  def display_distance(remote_car) when is_struct(remote_car) do
    case remote_car do
      %RemoteControlCar{} -> "#{remote_car.distance_driven_in_meters} meters"
      _ -> raise(FunctionClauseError, "Provide a RemoteControlCar")
    end
    
  end

  def display_battery(remote_car) when is_struct(remote_car) do
    # Cries out for function composition - macro with is_struct guard & type validator?
    case remote_car do
      %RemoteControlCar{} -> case remote_car.battery_percentage do
        0 -> "Battery empty"
        _ -> "Battery at #{remote_car.battery_percentage}%"
      end
      _ -> raise(FunctionClauseError, "Provide a RemoteControlCar")
    end
  end

  def drive(remote_car) when is_struct(remote_car) do
    case remote_car do
      %RemoteControlCar{} ->
        if remote_car.battery_percentage >= 1 do
           %RemoteControlCar{remote_car | battery_percentage: remote_car.battery_percentage - 1, distance_driven_in_meters: remote_car.distance_driven_in_meters + 20} # No += or -=, apparently
        else
          remote_car
        end
      _ -> raise(FunctionClauseError, "Provide a RemoteControlCar")
    end
  end
end
