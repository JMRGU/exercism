(import (rnrs))

(define (square-of-sum n)
  (define (sum n)
    (if (<= n 1)
        n
        (+ n (sum (- n 1)))))
  (* (sum n) (sum n)))

(define (sum-of-squares n)
  (if (<= n 1)
      n
      (+ (* n n) (sum-of-squares (- n 1)))))

(define (difference-of-squares n)
  (let 
    ((s1 (square-of-sum n))
    (s2 (sum-of-squares n)))
    (- s1 s2)))