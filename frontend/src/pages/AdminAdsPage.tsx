import { useEffect, useState } from 'react'
import axios from 'axios'
export default function AdminAdsPage() {
  const [ads, setAds] = useState([])
  useEffect(() => {
    axios.get('/api/admin/ads/campaigns').then(r => setAds(r.data.data||[]))
  },[])
  const act = (id, action) => {
    axios.put(`/api/admin/ads/${id}/${action}`).then(()=>setAds(a=>a.map(x=>x.id===id?{...x,status:action==='approve'?'active':action}:{...x})) )
  }
  return <div style={{padding:24}}>
    <h2>Ad Campaign Approval</h2>
    <table><thead><tr><th>ID</th><th>User</th><th>Target</th><th>Status</th><th>Budget</th><th>Spend</th><th>Impr</th><th>Clicks</th><th>Actions</th></tr></thead>
    <tbody>
      {ads.map(ad=>(<tr key={ad.id}>
        <td>{ad.id}</td>
        <td>{(ad.user&&ad.user.id)||ad.user_id}</td>
        <td>{ad.target_type}:{ad.target_id}</td>
        <td>{ad.status}</td>
        <td>{ad.budget_total}</td>
        <td>{ad.spent_total}</td>
        <td>{ad.impressions}</td>
        <td>{ad.clicks}</td>
        <td>
          <button onClick={()=>act(ad.id,'approve')}>Approve</button>
          <button onClick={()=>act(ad.id,'reject')}>Reject</button>
          <button onClick={()=>act(ad.id,'pause')}>Pause</button>
        </td>
      </tr>))}
    </tbody>
    </table>
  </div>
}
