package advantages

import (
	"fmt"
	"time"
)

func say(who string, s string) {
	for i := 0; i < 3; i++ {
		time.Sleep(100 * time.Millisecond)
		fmt.Printf("%v say: %v\n", who, s)
	}
}
func Goroutine() {
	go say("Duy", "Yolo")
	say("USA", "Nuclear")
}
