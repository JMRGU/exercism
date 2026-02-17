module CarsAssemble

let successRate (speed: int): float =
    if speed < 1 then
        0.0
    elif speed < 5 then
        1.0
    elif speed < 9 then
        0.9
    elif speed < 10 then
        0.8
    else
        0.77

let productionRatePerHour (speed: int): float =
    221.0 * float speed * successRate speed

let workingItemsPerMinute (speed: int): int =
    int (productionRatePerHour speed / 60.0)
