FROM node:16-slim as BUILDER
LABEL maintainer="Matheus Lesbao"

WORKDIR /usr/src/app

#install app dependencies
COPY package*.json ./
RUN npm install

COPY src ./src

FROM node:16-alpine

ARG NODE_ENV

WORKDIR /usr/src/app

COPY --from=BUILDER /usr/src/app

EXPOSE 3000

CMD ["npm", "start"]
