FROM python:3
COPY . /app
WORKDIR /app
RUN pip install -r requirements.txt
RUN pip install gunicorn
EXPOSE 8086
CMD [ "gunicorn", "-b", ":8086", "installfest-serve:app" ]
