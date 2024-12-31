with open("config.yml.sample") as cfg:
    with open("dex.env") as env:
        c = cfg.read()
        for rep in [i.split("=") for i in env.read().split("\n") if i]:
            c = c.replace("$"+rep[0], rep[1])
        with open("config.yml", "w") as f:
            f.write(c)

