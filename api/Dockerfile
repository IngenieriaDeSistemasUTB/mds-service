FROM node:slim

RUN npm install -g pm2

COPY . /app

WORKDIR /app

# Install npm pkgs
RUN npm install

# Start the app with pm2
CMD npm start