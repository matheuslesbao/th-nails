const express = require("express");
const app = express();
// Middlewares
const morgan = require("morgan");
app.use(morgan("dev"));

// Variables
const port = process.env.PORT || 3000;

app.listen(port, () => {
  console.log(`Back-end rodando em http://localhost:${port}`);
});
