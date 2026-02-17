(import (rnrs))

; mod4 AND mod100 AND mod400 == 0
; OR
; mod4 == 0 AND mod100 != 0

(define (leap-year? year)
  (cond
       ((and (= (modulo year 4) 0) (= (modulo year 100) 0) (= (modulo year 400) 0)) #t)
       ((and (= (modulo year 4) 0) (not (= (modulo year 100) 0))) #t)
       (else #f)))

