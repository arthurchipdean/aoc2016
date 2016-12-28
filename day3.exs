{:ok, content} = File.read("input3.txt")
lines = String.split(content, "\r\n", trim: true)

result = Enum.reduce(lines, 0, fn(line, acc) ->
  parts = String.split(line, "  ", trim: true)
  a = Enum.at(parts,0) |> String.strip() |> String.to_integer()
  b = Enum.at(parts,1) |> String.strip() |> String.to_integer()
  c = Enum.at(parts,2) |> String.strip() |> String.to_integer()
  if a + b > c && a + c > b && b + c > a, do: acc + 1, else: acc
end)

IO.puts result
