{:ok, content} = File.read("input4.txt")
lines = String.split(content,"\n", trim: true)
Enum.reduce(lines, state, fn(line, acc) ->
  
end)
