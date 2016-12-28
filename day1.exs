data = "L2, L3, L3, L4, R1, R2, L3, R3, R3, L1, L3, R2, R3, L3, R4, R3, R3, L1, L4, R4, L2, R5, R1, L5, R1, R3, L5, R2, L2, R2, R1, L1, L3, L3, R4, R5, R4, L1, L189, L2, R2, L5, R5, R45, L3, R4, R77, L1, R1, R194, R2, L5, L3, L2, L1, R5, L3, L3, L5, L5, L5, R2, L1, L2, L3, R2, R5, R4, L2, R3, R5, L2, L2, R3, L3, L2, L1, L3, R5, R4, R3, R2, L1, R2, L5, R4, L5, L4, R4, L2, R5, L3, L2, R4, L1, L2, R2, R3, L2, L5, R1, R1, R3, R4, R1, R2, R4, R5, L3, L5, L3, L3, R5, R4, R1, L3, R1, L3, R3, R3, R3, L1, R3, R4, L5, L3, L1, L5, L4, R4, R1, L4, R3, R3, R5, R4, R3, R3, L1, L2, R1, L4, L4, L3, L4, L3, L5, R2, R4, L2"
pieces = String.split(data, ", ")
state = %{
	:north => 0,
	:west => 0,
	:south => 0,
	:east => 0,
	:i => 0
}
directions = ["north","east","south","west"]
result = Enum.reduce(pieces, state, fn(piece, acc) ->
	dir = String.slice(piece, 0, 1)
	blocks = String.to_integer(String.slice(piece, 1, 5000))
	i = acc[:i]
	i = if dir == "L", do: i - 1, else: i + 1
	i = if i < 0, do: 3, else: i
	i = if i > 3, do: 0, else: i
	currentDirection = String.to_atom(Enum.at(directions, i))
	{_,dirCount} = Map.fetch(acc, currentDirection)
	acc = Map.put(acc, currentDirection, dirCount+blocks)
	Map.put(acc, :i, i)
end)
IO.puts abs(result[:east] - result[:west]) + abs(result[:north] - result[:south])
