const puppeteer = require('puppeteer')
const express = require('express')

const app = express()
const path = process.cwd()
app.use(express.static(path))
const server = app.listen(3000)

const file = process.argv[2]
const width = 1 * (process.argv[3] || 1024)
const height = 1 * (process.argv[4] || 768)

console.log(file, width, height)

const job = async () => {
  const browser = await puppeteer.launch({
headless: false,
        slowMo: 3000,
        devtools: true})
  const page = await browser.newPage()

  page.on('console', msg => console.log(msg))

  page.setViewport({ width, height })
  await page.goto(`http://localhost:3000/${file}`)
  await page.screenshot({path: 'screenshot.png'})
  await browser.close()
  server.close()
}

job()
