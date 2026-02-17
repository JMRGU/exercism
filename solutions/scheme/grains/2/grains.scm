(import (rnrs))

(define (square n)
  "For any given square, grains == 2^(n-1)"
  (assert (<= 1 n 64))
  (expt 2(- n 1)))

(define (sum n)
  "Number of grains on this square, plus number of grains on prior square, plus..."
  (cond ((<= n 0) 0)
        (else (+ (square n) (sum (- n 1))))))

(define total
  (sum 64))



