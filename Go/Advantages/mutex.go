package advantages

import (
	"fmt"
	"sync"
)

var count = 0
var mutex sync.Mutex

func counting(time int) {
	for i := 0; i < 5; i++ {
		count++
	}
	fmt.Printf("Count after i = %v, count: %v\n", time, count)
}
func countingMutex(time int) {
	for i := 0; i < 5; i++ {
		mutex.Lock() //Lock
		count++
		mutex.Unlock()
	}
	fmt.Printf("Count after i = %v, count: %v\n", time, count)
}

func Mutex() {
	for i := 0; i < 3; i++ {
		go counting(i) //without mutex
	}

	for i := 0; i < 3; i++ {
		go countingMutex(i) //with mutex
	}
}
