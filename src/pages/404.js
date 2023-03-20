import Link from 'next/link'

export default function Error404 () {
  return (
    <>
      <h1>404 - Page not found! Sorry</h1>
      <Link href='/'> Home </Link>
    </>
  )
}
