FROM debian:9-slim

RUN apt-get update && apt-get install wget gnupg -y
RUN wget https://repo.percona.com/apt/percona-release_0.1-6.stretch_all.deb
RUN dpkg -i percona-release_0.1-6.stretch_all.deb
RUN apt-get update
RUN apt-get install percona-xtrabackup-80 -y

CMD ["bash"]