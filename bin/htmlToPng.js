const puppeteer = require('puppeteer')
const express = require('express')

const app = express()
const path = process.cwd()
app.use(express.static(path))
const server = app.listen(3000)

if (process.argv[2] !== 'server') {
  const file = process.argv[2]
  const width = 1 * (process.argv[3] || 1024)
  const height = 1 * (process.argv[4] || 768)

  console.log(file, width, height)
  let browser

  const job = async () => {
    try {
      browser = await puppeteer.launch()
      const page = await browser.newPage()

      page.on('console', msg => console.log(msg))
      page.on('error', err => console.error(err))

      page.setViewport({ width, height })
      await page.goto(`http://localhost:3000/${file}`)
      page.waitForTimeout(5000)
      await page.screenshot({path: 'screenshot.png'})
    } catch (err) {
      console.error(err.message, err);
    } finally {
      await browser.close()
      server.close()
    }
  }

  job()
}
