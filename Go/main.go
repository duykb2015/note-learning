package main
import (
	"fmt"
)

type SomeStruct struct{
    Field string
}
func main() {
    value := SomeStruct{Field: "Structs are values"}
    copy  := value
    copy.Field = "This is a Copy & doesn't change the variable value"
    fmt.Println(value.Field)
    fmt.Println(copy.Field)
}
