FROM tutum/lamp:latest

RUN rm -rf /var/www/html/index.html

COPY  /html /var/www/html

CMD ["/run.sh"]