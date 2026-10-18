import CouponListPage from '../pages/Coupon/CouponListPage';
import CouponFormPage from '../pages/Coupon/CouponFormPage';

const couponRoutes = [
  { path: '/coupons', element: <CouponListPage /> },
  { path: '/coupons/new', element: <CouponFormPage /> },
  { path: '/coupons/:id/edit', element: <CouponFormPage /> },
];

export default couponRoutes;
