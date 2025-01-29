# openwebui

chatgpt-esque UI clone that interfaces with `ipex-llm`'s `ollama serve` on the backend.

# configuration

create an openwebui.env that looks something like
```
OAUTH_CLIENT_SECRET=<secret from/for dex>
```

done manually via the web interface once the container starts: 

* ensure that the `ipex-llm` container is configured as a backend

# running

docker compose up -d