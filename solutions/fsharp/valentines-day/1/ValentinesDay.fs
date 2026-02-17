module ValentinesDay

type Approval =
    | Yes
    | No
    | Maybe

type Cuisine =
    | Korean
    | Turkish

type Genre =
    | Crime
    | Horror
    | Romance
    | Thriller

type Activity =
    | BoardGame
    | Chill
    | Movie of Genre
    | Restaurant of Cuisine
    | Walk of int

let rateActivity (activity: Activity): Approval =
    match activity with
    | BoardGame -> Approval.No
    | Chill -> Approval.No
    | Movie Genre.Romance -> Approval.Yes
    | Movie _ -> Approval.No
    | Restaurant Cuisine.Korean -> Approval.Yes
    | Restaurant _ -> Approval.Maybe
    | Walk distance when distance < 3 -> Approval.Yes
    | Walk distance when distance < 5 -> Approval.Maybe
    | Walk _ -> Approval.No
    
