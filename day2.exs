{:ok, content} = File.read("input2.txt")
lines = String.split(content,"\n", trim: true)
state = %{
  :i => 1,
  :k => 1,
  :code => ""
}
buttons = [[1,2,3],[4,5,6],[7,8,9]]
result = Enum.reduce(lines, state, fn(line, acc) ->
  letters = String.split(line, "")
  acc = Enum.reduce(letters, acc, fn(letter, acc) ->
    i = acc[:i]
    k = acc[:k]
    i = cond do
      letter == "U" && i > 0 ->
        i - 1
      letter == "D" && i < 2 ->
        i + 1
      true ->
        i
    end
    k = cond do
      letter == "L" && k > 0 ->
        k - 1
      letter == "R" && k < 2 ->
        k + 1
      true ->
        k
    end
    acc = Map.put(acc, :k, k)
    Map.put(acc, :i, i)
  end)
  str = Integer.to_string(Enum.at(buttons, acc[:i]) |> Enum.at(acc[:k]))
  code = Map.get(acc, :code) <> str
  Map.put(acc, :code, code)
end)
IO.puts result[:code]
