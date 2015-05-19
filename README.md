### AFL - A Functional Language

AFL is a simple functional language written in `PHP`.

AFL code and related documentation is licensed under GPL version 2.
Refer to LICENSE file for complete licensing terms.

### Documentation

Complete documentaion is available here http://xkoder.com/afl/help.php


### Try out AFL

Try out AFL here : http://xkoder.com/afl

## Run example scripts
Example scripts are located inside `example/` folder.
Run them from the command line as follows:

```bash
# ./afli < example/name_of_script.afl
```

_Example:_
```bash
# ./afli < example/map.afl
```

## Run in interactive mode
Download code and run
```bash
# ./afli -i
```

#### Commands available in interactive mode
* `help` - display short help
* `dump` - dump the symbol table
* `quit` / `exit` - end interactive mode

## Switching on Trace

You can invoke AFL with trace ON as follows

```bash
# ./afli -t < scriptfile
```

OR

```bash
# ./afli -i -t
```

Trace mode outputs internal states while the AFL script is running.
