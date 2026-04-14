import { useEffect, useState } from 'react'
import axios from 'axios'
export default function AdminModerationPage() {
  const [flagged, setFlagged] = useState([])
  const [loading, setLoading] = useState(true)
  useEffect(() => {
    axios.get('/api/admin/moderation/flagged-users').then(r=>{
      setFlagged(r.data.data || [])
      setLoading(false)
    })
  },[])
  const act = (id, action) => {
    axios.put(`/api/admin/moderation/${id}/${action}`).then(()=>{
      setFlagged(f=>f.filter(row=>row.id!==id))
    })
  }
  if(loading) return <div>Loading...</div>
  return <div style={{padding:24}}>
    <h2>Flagged Users</h2>
    <table><thead><tr><th>ID</th><th>User</th><th>Reason</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      {flagged.map(u=>(<tr key={u.id}>
        <td>{u.id}</td>
        <td>{u.user_id}</td>
        <td>{u.reason}</td>
        <td>{u.status}</td>
        <td>
          <button onClick={()=>act(u.id,'review')}>Review</button>
          <button onClick={()=>act(u.id,'approve')}>Approve</button>
          <button onClick={()=>act(u.id,'ban')}>Ban</button>
        </td>
      </tr>))}
    </tbody>
    </table>
  </div>
}
