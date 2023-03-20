import { doc, getDoc, getDocs, collection } from 'firebase/firestore'
import Head from 'next/head'
import { useRouter } from 'next/router'
import { db } from '../../../firebase'

export default function Product ({ product, notFound }) {
  const router = useRouter()
  if (notFound) {
    router.push('/403')
  }
  return (
    <>
      <Head>
        <title>Cafetería Baratto</title>
        <meta name='description' content={product.Name} />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <link rel='icon' href='/favicon.ico' />
      </Head>
      <div>
        <h1>Product {product.id}!</h1>
      </div>
    </>
  )
}

export async function getStaticPaths () {
  const paths = []
  const getDocuments = await getDocs(collection(db, 'Products'))
  getDocuments.forEach(document => paths.push({ params: { id: document.id } }))
  return {
    paths,
    fallback: false
  }
}

export async function getStaticProps ({ params }) {
  const getProduct = await getDoc(doc(db, 'Products', params.id))
  let product = {}
  let notFound = false
  if (getProduct.exists()) {
    product = { ...getProduct.data(), id: params.id }
  } else notFound = true

  return {
    props: {
      product,
      notFound
    }
  }
}
