#lang racket

(provide collatz)

; Recursively: can't add args to collatz, so define a cheeky inner recursive function with an additional counter arg

(define (collatz n)
  (define (inner_collatz n c)
   (cond [(<= n 0) (error "Number cannot be zero or below!")]
         [(= n 1) c]
         [(even? n) (inner_collatz (/ n 2) (+ c 1))]
         [else (inner_collatz (+ (* n 3) 1) (+ c 1))]))
  (inner_collatz n 0))
