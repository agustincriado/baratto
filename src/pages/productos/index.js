import { collection, getDocs } from 'firebase/firestore'
import Image from 'next/image'
import { db } from '../../../firebase'
import styles from '@/styles/Home.module.css'

export default function Productos ({ productsArray }) {
  return (
    <>
      <main className={styles.main}>
        {productsArray.length === 0 && <h1>Cargando...</h1>}
        {productsArray.length > 0 && productsArray.map(({ Name, Cost, Stock, ImgSrc }, index) => (
          <div className={styles.product} key={index}>
            <Image src={ImgSrc} />
            <h1>{Name}</h1>
            <span>{Cost}</span>
            <span>{Stock}</span>
          </div>
        ))}
      </main>
    </>
  )
}

export async function getStaticProps () {
  const productsArray = []
  const getProds = await getDocs(collection(db, 'Products'))
  getProds.forEach(document => productsArray.push({ ...document.data(), id: document.id }))
  return {
    props: {
      productsArray
    }
  }
}
