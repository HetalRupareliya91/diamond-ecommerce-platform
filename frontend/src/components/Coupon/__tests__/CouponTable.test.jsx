import { render, screen } from '@testing-library/react';
import CouponTable from '../CouponTable';

describe('CouponTable', () => {
  it('renders an empty state', () => {
    render(<CouponTable items={[]} />);
    expect(screen.getByText(/no coupons found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<CouponTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
